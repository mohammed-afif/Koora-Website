var today = new Date().toLocaleDateString(undefined, {
month: '2-digit',
day: '2-digit',
year: 'numeric'
})
 document.getElementById("time").innerHTML = today ;
