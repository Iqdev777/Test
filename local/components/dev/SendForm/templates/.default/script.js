document.addEventListener('DOMContentLoaded',function ()
{
    let countField = 1
    let parent = document.getElementById('multiple-fields')
    const clone = document.querySelector('.multiple-field').innerHTML

    document.body.addEventListener('click', e =>
    {
        if (e.target.classList.contains('add')){
            let div = document.createElement('div');
            div.innerHTML = clone
            div.style.display = 'flex'
            div.className = 'multiple-field'
            parent.append(div)
            countField++
        }
    })

    document.body.addEventListener('click', e =>
    {
        if (e.target.classList.contains('delete')) {
            if (countField !== 1) {
                e.target.parentNode.parentNode.removeChild(e.target.parentNode)
                countField--
            }
        }
    })

    function clearData() {
        document.querySelector('input[name="title-request"]').value = ''
        document.querySelectorAll('input[name="category"]')[0].checked = true
        document.querySelectorAll('input[name="type_request"]')[0].checked = true
        document.querySelector('select[name="stock"]').selectedIndex = 0

        document.querySelectorAll('.delete').forEach(
            (el,key) => {
                if (key !== 0) el.click()
        })


        document.querySelector('select[name="brand[]"]').selectedIndex = 0

        document.querySelector('input[name="title[]"]').value = ''

        document.querySelector('input[name="count[]"]').value = ''

        document.querySelector('input[name="packaging[]"]').value = ''

        document.querySelector('input[name="files[]"]').value = ''

        document.querySelector('textarea[name="comment"]').value = ''
    }


    document.querySelector('.send').addEventListener('click',function () {

        let titleRequest = document.querySelector('input[name="title-request"]').value
        let categoryRadio = document.querySelector('input[name="category"]:checked').value
        let type_requestRadio = document.querySelector('input[name="type_request"]:checked').value

        if (titleRequest)
        {
            let Data = new FormData()
            Data.append('titleRequest', titleRequest)
            Data.append('categoryRadio', categoryRadio)
            Data.append('type_requestRadio',type_requestRadio)

            let stockSelect = document.querySelector('select[name="stock"]').value
            let brands = document.getElementsByName('brand[]')
            let titles = document.getElementsByName('title[]')
            let counts = document.getElementsByName('count[]')
            let packagings = document.getElementsByName('packaging[]')
            let clients = document.getElementsByName('client[]')
            let files = document.querySelector('input[name="files[]"]').files
            let comment = document.querySelector('textarea[name="comment"]').value

            if (stockSelect) {
                Data.append('stockSelect',stockSelect)
            }
            if(comment) {
                Data.append('comment', comment)
            }

            if (titles)
            {
                let request = []
                for (let i = 0; i < titles.length; i++)
                {
                    request.push({
                        brand:brands[i].value,
                        title: titles[i].value,
                        count: counts[i].value,
                        packagings: packagings[i].value,
                        client:clients[i].value
                    })
                }

                Data.append('request',JSON.stringify(request))

                if (files)
                {
                    for (let i = 0; i < files.length; i++)
                    {
                        Data.append(files[i].name,files[i])
                    }
                }

                BX.ajax.runComponentAction('dev:SendForm', "sendForm",
                {
                    mode: 'class',
                    data: Data,
                    contentType: false,
                    processData: false,
                    dataType: "json"
                }).then((data) =>{
                    alert('Форма отправлена')
                    clearData()
                    return data
               },(reason) => {
                    clearData()
                    return reason
               }).catch((error) =>{
                   return error
               })

            }
        } else {
            alert('Вы не заполнили обязательные поля (Заголовок заявки,категория,вид заявки)')
        }

    })

})
