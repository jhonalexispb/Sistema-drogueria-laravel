class d{static sweetAlert2(){let e=Swal.mixin({buttonsStyling:!1,target:"#page-container",customClass:{confirmButton:"btn btn-primary m-1",cancelButton:"btn btn-danger m-1",input:"form-control"}}),n=document.querySelector(".js-swal-simple");n&&n.addEventListener("click",t=>{e.fire("Hi, this is just a simple message!")});let s=document.querySelector(".js-swal-success");s&&s.addEventListener("click",t=>{e.fire("Success","Everything was updated perfectly!","success")});let i=document.querySelector(".js-swal-info");i&&i.addEventListener("click",t=>{e.fire("Info","Just an informational message!","info")});let o=document.querySelector(".js-swal-warning");o&&o.addEventListener("click",t=>{e.fire("Warning","Something needs your attention!","warning")});let r=document.querySelector(".js-swal-error");r&&r.addEventListener("click",t=>{e.fire("Oops...","Something went wrong!","error")});let a=document.querySelector(".js-swal-question");a&&a.addEventListener("click",t=>{e.fire("Question","Are you sure about that?","question")}),$(document).on("click",'.js-swal-confirm-modal button[type="submit"]',function(t){t.preventDefault();const l=$(this).closest(".js-swal-confirm-modal"),m=l.data("element-item");e.fire({title:`¿Estás seguro de eliminar el registro ${m}?`,text:"Esta operación es irreversible",icon:"warning",showCancelButton:!0,customClass:{confirmButton:"btn btn-danger m-1",cancelButton:"btn btn-secondary m-1"},confirmButtonText:"Si, borremos esto",cancelButtonText:"Cancelar"}).then(u=>{u.value?l.submit():u.dismiss==="cancel"&&e.fire("Cancelado","No se realizaron cambios","error")})});let c=document.querySelector(".js-swal-custom-position");c&&c.addEventListener("click",t=>{e.fire({position:"top-end",title:"Perfect!",text:"Nice Position!",icon:"success"})})}static init(){this.sweetAlert2()}}Dashmix.onLoad(()=>d.init());
