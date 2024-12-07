<script> 
           let toggle = document.querySelector('.toggle');
           let navigation = document.querySelector('.navigation');
           let main = document.querySelector('.main-content');
           let list = document.querySelectorAll('.navigation li');
           let formClose = document.querySelector('#form-close');
           let loginForm = document.querySelector('.login-form-container');           
           let formBtn = document.querySelector('#add-btn');

           toggle.onclick =function(){
               navigation.classList.toggle('active');
               main.classList.toggle('active');
           };
           
           function activelink(){
                list.forEach((item) =>
                item.classList.remove('hovered'));
                this.classList.add('hovered');
            };

            list.forEach((item) =>
                item.addEventListener('mouseover',activelink)
            );

            formBtn.addEventListener('click', () =>{
                loginForm.classList.add('active');
            });

            formClose.addEventListener('click', () =>{
                loginForm.classList.remove('active');
            });
</script>