Toastify({
    text:data.msg,
    duration: 3000,
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "{{ App::getLocale()==='ar'?'left':'right' }}", // `left`, `center` or `right`
    backgroundColor: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))",
    stopOnFocus: true, // Prevents dismissing of toast on hover
}).showToast();
