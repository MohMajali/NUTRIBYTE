/*document.querySelector('#homeNav').addEventListener('click', () => {
    window.location.replace("/Member/Dashboard")
    if (!document.getElementById("kt_body").hasAttribute("data-kt-aside-minimize")) {
        document.querySelector('#arrowLeftSide').click();
    }


})*/
document.querySelectorAll('.navSide').forEach(e => {
    e.addEventListener('click', () => {
        if (document.getElementById("kt_body").hasAttribute("data-kt-aside-minimize")) {
            document.querySelector('#arrowLeftSide').click();

        }
    })
}) 
  