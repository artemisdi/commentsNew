let debug = [];

window.onload = () => {
    $.ajax({
        url: 'server/server.php',
        type: 'post',
        data: {
            type: 'windowOnload'
        },
        dataType: 'json',
        success: function (data) {
            for (let i in data) {
                addComent(data[i]);
            }
        }
    });
};

/**
 * обработчик событий по клику мышкой
 */
document.getElementById('formButtServer').onclick = () => {
    addComment();
};

let addComment = function () {
    let formName = document.getElementById('formUserName');
    let formEmail = document.getElementById('formEmail');
    let formTextarea = document.getElementById('formComment');
    //проверка на заполненность полей
    if (formName.value !== '' && formEmail.value !== '' && formTextarea.value !== '' && formEmail.value.includes('@')) {
        $.ajax({
            url: 'server/server.php',
            type: 'post',
            data: {
                type: 'click',
                name: formName.value.replace(/(\<(\/?[^>]+)>)/g, ''),
                email: formEmail.value.replace(/(\<(\/?[^>]+)>)/g, ''),
                comment: formTextarea.value.replace(/(\<(\/?[^>]+)>)/g, '')
            },
            dataType: 'json',
            success: function (data) {
                addComent(data);
            }
        });
        AnimationImg();
        formName.value = '';
        formEmail.value = '';
        formTextarea.value = '';
    } else {
        debug.push('строка пустая, пожалуста заполните поля');
        console.log(`массив ошибок debug\n ошибка ${debug[debug.length - 1]}\n всего шибок - ${debug.length}`)
    }
}

/**
 * Функция построения карточек коментов
 * @param data - данные с сервера
 */
let addComent = (data) => {
    let bodyBlock = document.getElementById('containerComment');
    bodyBlock.innerHTML += `<div class="comments-user__comment col-xl-4 col-lg-5 offset-lg-0 col-md-6 col-sm-8 col-8">
                <div class="header">
                    <span>${data.name}</span>
                </div>
                <div class="body">
                    <span>${data.email}</span>
                    <span>${data.comment}</span>
                </div>
            </div>`
};

/**
 * Функция по добавлению класса с анимацией,при удачной отправке
 * @constructor
 */
let AnimationImg = () => {
    document.getElementById('maleImg').classList.add('add-comment');
    setTimeout(function () {
        if (document.getElementById('maleImg').classList.contains('add-comment')) {
            document.getElementById('maleImg').classList.remove('add-comment');
        }
    }, 1000)
};

