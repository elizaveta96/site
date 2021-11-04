async function likeArticle() {
    let element = event.target;
    let articleId = element.dataset.identifier;

    const response = await axios.post('/likeArticle', {id: articleId});

    if(response.data.likes) {
       const likesCount = document.getElementById('likes-count');
       likesCount.innerText = response.data.likes;
    }
}


async function updateViews() {
    let element = document.getElementById('views');
    if(element) {
        let articleId = element.dataset.identifier;

        const response = await axios.post('/updateViews', {id: articleId});

        if(response.data.views) {
            element.innerText = `${response.data.views}`;
        }
    }
}
setTimeout(updateViews, 5000);


const addCommentForm = document.getElementById('add-comment');
if(addCommentForm) {
    addCommentForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        //очсистим ошибки валидации
        let messageContainers = document.querySelectorAll('.text-danger');

        for(let item of messageContainers) {
            item.innerText = '';
            item.style.display = 'none';
        }

        axios.post('/addComment', formData)
            .then((result) => {
                const successMessage = document.getElementById('add-comment-success');
                this.style.display = 'none';
                successMessage.style.display = 'block';

            })
            .catch((error) => {
                const errors = error.response.data.errors;

                for(let item in errors) {
                    let message = errors[item][0];

                    //добавим ошибки валидации
                    let messageContainer = document.getElementById(`${item}-error`);
                    messageContainer.innerText = message;
                    messageContainer.style.display = 'block';
                }
            });
    });
}
