function f1() {
  document.querySelector('#create-item-form').addEventListener('submit', (e) => {
    document.querySelector('.loader__wrapper').style.display = 'flex'
    e.preventDefault()
    let formData = new FormData()
    formData.append('name', document.querySelector('#name').value)
    formData.append('barcode', document.querySelector('#barcode').value)
    formData.append('owner', document.querySelector('#owner').value)
    formData.append('status', document.querySelector('#status').value)
    formData.append('who_add', document.querySelector('#who_add').value)

    async function createNewWorker(data) {
      const res = fetch('../php/update-object.php', {
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
        document.querySelector('.info').innerHTML = 'Запись обновлена'
      }
    }
    createNewWorker(formData)
  })
  document.querySelector('.create-item-form').remove()
}