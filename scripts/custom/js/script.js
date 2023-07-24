document.addEventListener('DOMContentLoaded', function () {
    var dropdownButton = document.getElementById('dropdownMenuButton');
    dropdownButton.addEventListener('click', function () {
        var dropdownMenu = document.querySelector('.dropdown-menu');
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
            dropdownMenu.classList.remove('dropdown-menu-start');
        } else {
            dropdownMenu.style.display = 'block';
            dropdownMenu.classList.add('dropdown-menu-start');
        }
    });
});
