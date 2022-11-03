 <!-- SCRIPT LOADING START FORM HERE /////////////-->
 <!-- plugins:js -->
 <script src="/assets/vendors/js/core.js"></script>
 <!-- endinject -->
 <!-- Vendor Js For This Page Ends-->
 <script src="/assets/vendors/apexcharts/apexcharts.min.js"></script>
 <script src="/assets/vendors/chartjs/Chart.min.js"></script>
 <script src="/assets/js/charts/chartjs.addon.js"></script>
 <!-- Vendor Js For This Page Ends-->
 <!-- build:js -->
 <script src="/assets/js/template.js"></script>
 <script src="/assets/js/dashboard.js"></script>
 <!-- endbuild -->
 <!-- build:ckeditor -->
 <script>
ClassicEditor.create(document.getElementById('inputEditor'))
    .catch(error => {
        console.error(error);
    });

// let theEditor;
// ClassicEditor.create(document.querySelector("#inputEditor"), {
//         ckfinder: {},
//         mediaEmbed: {
//             previewsInData: true
//         },
//     })
//     .then((editor) => {
//         theEditor = editor;
//     })
//     .catch((error) => {
//         console.error(error);
//     });

// function getDataFromTheEditor() {
//     return theEditor.getData();
// }
 </script>
 <script>
let message = $(".swal").attr('message')
let icon = $(".swal").attr('status')
if (message) {
    swal({
        // title: "Good job!",
        text: message,
        icon: icon,
        button: false,
        closeOnEsc: true,
        timer: 2000,
    })
}
 </script>
 <script type="text/javascript">
$('.show_confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
            text: `Are you sure to delete? it will be gone forever.`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});

// Preview Image
function previewImg() {
    const thumbnail = document.querySelector('#thumbnail');
    const thumbnailLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    thumbnailLabel.textContent = thumbnail.files[0].name;

    const thumbFile = new FileReader();
    thumbFile.readAsDataURL(thumbnail.files[0]);

    thumbFile.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
 </script>