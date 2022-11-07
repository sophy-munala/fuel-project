const parentContainer  = document.querySelector('.service.box-container.box');
parentContainer.addEventListener('click', event=>{

    const current = event.target;
    const isReadMoreBtn = current.ClassName.include('read-more-btn');

    if(!isReadMoreBtn) return;
    const currentText = event.target.parentMode.querySelector('read-more-text');

    currentText.classList.toggle('read-more-text--show');
    current.textContent = current.textContent.includes('Read More')?
    "Read Less...": "Read More...";
})