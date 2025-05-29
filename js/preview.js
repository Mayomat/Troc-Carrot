document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('photo');
    const preview = document.getElementById('img');

    if (fileInput && preview) {
        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "../img/carrot-isolated-illustration.jpg"; // default image
            }
        });
    }
});
