document.querySelector('.content').addEventListener('click', (elem) => {
  if(elem.target.innerText.toLowerCase() == 'получить'){
    localStorage.setItem('action', 'takeProduct')
  } else if(elem.target.innerText.toLowerCase()  == 'сдать') {
    localStorage.setItem('action', 'returnProduct')
  } else {
    localStorage.setItem('action', '11111111111111')
  }
})