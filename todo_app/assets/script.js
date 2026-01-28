document.getElementById('search').addEventListener('keyup', function () {
const query = this.value;


fetch('search.php?q=' + encodeURIComponent(query))
.then(response => response.text())
.then(data => {
document.getElementById('results').innerHTML = data;
});
});