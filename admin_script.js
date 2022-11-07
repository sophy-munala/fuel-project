let navbar = document.querySelector('.navbar');
let accountBox = document.querySelector('.account-box');

document.querySelector ('#menu-btn').onclick = () =>{
	navbar.classList.toggle('active');
	accountBox.classList.remove('active');
}

document.querySelector ('#user-btn').onclick = () =>{
	accountBox.classList.toggle('active');
	navbar.classList.remove('active');
}
window.onscroll = () =>{
	navbar.classList.remove('active');
	accountBox.classList.remove('active');
}
document.querySelector('#close-update').onclick = () =>{
	document.querySelector('.edit-product-form').style.display = 'none';
	window.location.href = 'admin_products.php';
}

document.querySelector('#close-update').onclick = () =>{
	document.querySelector('.edit-automotive-form').style.display = 'none';
	window.location.href = 'admin_automotive.php';
}