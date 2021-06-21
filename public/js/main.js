


function showNav(mytoggle,mynav){
	var toggle=document.getElementById(mytoggle);
	var nav=document.getElementById(mynav);

	toggle.addEventListener('click',()=>{
		nav.classList.toggle('show');
	})
}

showNav('header-toggle','nav');
showNav('close','nav');

const liens=document.querySelectorAll('.lien');

function active(){
	liens.forEach(lien=>lien.classList.remove('active'));
	this.classList.add('active');
}

liens.forEach(lien=>lien.addEventListener('click',active));



//scroll effect
window.addEventListener('scroll',scrolleffect);
function scrolleffect(){
	const list=document.querySelector('.about-us');
	const image=document.querySelector('.why_image');
	

	if(window.scrollY>=360){
		list.style.opacity='1';
		list.style.transform='translateX(0px)';
		list.style.transition='.7s ease-in-out';
	}
	
	if(window.scrollY>=720){
		image.style.opacity='1';
		image.style.transform='translateX(0px)';
		image.style.transition='.7s ease-in-out';
	}

}


//contact form Ajax
$('.msg_form').on('submit',function(e){
	e.preventDefault();
	$.ajax({
		url:$(this).attr('action'),
		method:$(this).attr('method'),
		data:new FormData(this),
		processData:false,
		dataType:'json',
		contentType:false,
		beforeSend:function(){

		},
		success:function(data){
			$('.msg_form')[0].reset();
			Swal.fire(
				'Email Envoyer!',
				'merci pour nous avoir contacté!',
				'success'
			  )


		},


	});
});


//rendez vous form Ajax__________________________

$('.form-consultation').on('submit',function(e){
	e.preventDefault();
	$.ajax({
		url:$(this).attr('action'),
		method:$(this).attr('method'),
		data:new FormData(this),
		processData:false,
		dataType:'json',
		contentType:false,
		beforeSend:function(){

		},
		success:function(data){
			//$('.form-consultation')[0].reset();
			Swal.fire(
				'Rendez vous a été créé avec succès!',
				'On va vous appeler on quelque minute',
				'success'
			  )


		},


	});
});
