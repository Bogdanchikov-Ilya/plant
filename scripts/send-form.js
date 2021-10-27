document.querySelector('#form').addEventListener('submit', (e) => {
  document.querySelector('.loader__wrapper').style.display = 'flex'
  e.preventDefault()
  let formData = new FormData()
  formData.append('barcode', document.querySelector('#code').value)
  async function getData(a) {
    const res = fetch('../php/get-item.php', {
      method: 'POST',
      body: a
    })
      .then((res) => {
        return res.json()
      })
      .then((json) => {
        document.querySelector('.loader__wrapper').style.display = 'none'
        document.querySelector('input').value = ''
        return json
      })
    let result = await res
    console.log(result)
    document.querySelector('.main-wrapper').insertAdjacentHTML('beforeend', `
      <h1>По данному штрихкоду найден товар:</h1>
      <form action="#" id="create-item-form" class="create-worker-form">
      <div class="form-item">
        <label for="name">Название</label>
        <input required readonly type="text" id="name" value="${result.name}">
      </div>
      <div class="form-item">
        <label for="barcode">Значение штрих-кода</label>
        <input type="text" readonly required value="${result.barcode}" id="barcode">
        <img class="codeimg" id="code128"></img>
<!--        <button class="generate-code-btn">Сгенерировать код</button>-->
      </div>
      <div class="form-item">
        <label for="owner">Ответственный (можно менять)</label>
        <input type="text" required value="${result.owner}" id="owner">
      </div>
      <div class="form-item">
        <label for="status">Статус (можно менять)</label>
        <input type="text" required value="${result.status}" id="status">
      </div>
      <div class="form-item">
        <label for="who_add">Кто внес на склад</label>
        <input type="text" readonly value="${result.who_add}" required id="who_add">
      </div>

      <input type="submit" class="create-object-form" value="Обновить">
    </form>
<span class="info"></span>`)

      JsBarcode("#code128", 'fdsffdsfds')
      f1()

  }
  getData(formData)
})