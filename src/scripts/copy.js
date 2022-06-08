let data;
const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

const alert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${data+' '+message}</div>`,
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}
function copy(link){
   navigator.clipboard.writeText(link).then(() => {
      data = link;
       alert("Másolva a vágólapra.", "light"); 
     })
}
