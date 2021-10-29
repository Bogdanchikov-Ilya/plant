document.querySelector('#storekeeper').addEventListener('submit', (e) => {
  e.preventDefault()
  document.querySelector('.loader__wrapper').style.display = 'flex'
  let formData = new FormData()
  formData.append('storekeeperCode', document.querySelector('#storekeeperCode').value)
  async function auth(formData) {
    const res = fetch('../php/auth.php', {
      method: 'POST',
      body: formData
    }).then((res) => {
      return res.json()
    }).then((json) => {
      document.querySelector('#storekeeper').reset()
      document.querySelector('.loader__wrapper').style.display = 'none'
      return json
    })
    let result = await res
    console.log(result)
    if(result.status == true) {
      localStorage.setItem('auth', 'true');
      location.href = window.location.origin + '/storekeeper.html';
    } else if(result.status == false) {
      localStorage.setItem('auth', 'false');
      document.querySelector('.info').innerHTML = 'Неверный штрих-код кладовщика'
    }
  }
  auth(formData)
})