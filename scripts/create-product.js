document.querySelector('#create-item-form').addEventListener('submit', (e) => {
  document.querySelector('.loader__wrapper').style.display = 'flex'
  e.preventDefault()
  let formData = new FormData()
  formData.append('name', document.querySelector('#name').value)
  formData.append('barcode', document.querySelector('#barcode').value)
  formData.append('sum', document.querySelector('#sum').value)
  // formData.append('owner', document.querySelector('#owner').value)
  // formData.append('status', document.querySelector('#status').value)
  // formData.append('who_add', document.querySelector('#who_add').value)

  async function createNewWorker(data) {
    const res = fetch('../php/create-product.php', {
      method: 'POST',
      body: data
    }).then((res) => {
      return res.json()
    }).then((json) => {
      document.querySelector('.loader__wrapper').style.display = 'none'
      document.querySelector('.create-worker-form').reset()
      return json
    })
    let result = await res
    console.log(result)
    if(result.status == true) {
      document.querySelector('.content').innerHTML = `<h1>${result.text}</h1>`
    }else {
      document.querySelector('.content').innerHTML = `<h1>Ошибка при добавлении продукта</h1>`
    }
  }
  createNewWorker(formData)
})