import store from '../store'

store.subscribe((mutation) => {
  switch (mutation.type) {
    case 'SET_DRAWER':
      if (mutation.payload) {
        localStorage.setItem('drawer', mutation.payload)
      } else {
        localStorage.setItem('drawer', mutation.payload)
      }
      break;
    case 'SET_HISTORY':
      if (mutation.payload) {
        localStorage.setItem('history', mutation.payload)
      }else{
        localStorage.removeItem('history')
      }
      break;
  }
})
