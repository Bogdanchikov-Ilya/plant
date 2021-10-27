document.querySelector('#create-worker-form').addEventListener('submit', (e) => {
  document.querySelector('.loader__wrapper').style.display = 'flex'
  e.preventDefault()
  let formData = new FormData()
  formData.append('name', document.querySelector('#name').value)
  formData.append('surname', document.querySelector('#surname').value)
  formData.append('patronymic', document.querySelector('#patronymic').value)
  formData.append('barcode', document.querySelector('#barcode').value)
  formData.append('bitrixId', document.querySelector('#bitrixId').value)

  async function createNewWorker(data) {
    const res = fetch('../php/create-worker.php', {
      method: 'POST',
      body: data
    }).then((res) => {
      return res.json()
    }).then((json) => {
      document.querySelector('.loader__wrapper').style.display = 'none'
      // document.querySelector('.create-worker-form').reset()
      return json
    })
    let result = await res
    console.log(result)
    if(result.status == true) {
      document.querySelector('.info').innerHTML = 'Запись добавлена'
    }
  }
  createNewWorker(formData)
})