document.querySelector('.content').addEventListener('click', (elem) => {
  if(elem.target.innerText == 'Получить'){
    localStorage.setItem('action', 'takeProduct')
  } else if(elem.target.innerText == 'Сдать') {
    localStorage.setItem('action', 'returnProduct')
  } else {
    localStorage.setItem('action', '11111111111111')
  }
})