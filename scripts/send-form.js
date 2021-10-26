document.querySelector('.btn-form').addEventListener('click', (e) => {
  document.querySelector('.loader__wrapper').style.display = 'flex'
  e.preventDefault()
  let formData = new FormData()
  formData.append('code', document.querySelector('input').value)
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
        return json
      })
    let result = await res
    console.log(result)
  }
  getData(formData)
})