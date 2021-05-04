function slide_func(){
    //객체 변수 선언
    let slideshow=document.querySelector("div.slideshow");
    let slideshowSlides=document.querySelector("div.slideshow_slides");
    let slides=document.querySelectorAll("div.slideshow_slides a");
    let prev=document.querySelector(".prev");
    let next=document.querySelector(".next");
    let timer;//타이머 설정 변수
    
    let slideCount=slides.length;

    let currentIndex=0; //슬라이드 현재위치 카운트
    //슬라이드를 가로로 배열해서 배치한다.
    for(let i=0;i<slideCount;i++){
        let newLeft=i*100+'%'
        slides[i].style.left=newLeft;
    }
    //슬라이드를 이동시켜보자
    function gotoSlide(index){
        currentIndex=index;
        let newLeft=-(currentIndex*100)+'%';
        slideshowSlides.style.left=newLeft;
        slideshowSlides.classList.add('animated');
        //0번이면 왼쪽 3번이면 오른쪽 안보이게하기.
        (currentIndex===0)?(prev.classList.add('disabled')):(prev.classList.remove('disabled'));
        (currentIndex===3)?(next.classList.add('disabled')):(next.classList.remove('disabled'));

    }
    //슬라이드 초기화 위치
    gotoSlide(2);
   
    //prev네비게이션바에 onClick등록하고 이벤트핸들러
    prev.addEventListener('click',function(e){
       e.preventDefault();//가지고 있는 a앵커 기능을 없앤다
       let index=currentIndex;
       index=(index===0)?slideCount-1:index-1;
       gotoSlide(index);
    });

    next.addEventListener('click',function(e){
        e.preventDefault();//가지고 있는 a앵커 기능을 없앤다
        let index=currentIndex;
        index=(index===slideCount-1)?0:index+1;
        gotoSlide(index);
     });

     //자동 타이머 기능을 부여
     function startTimer(){
     timer=setInterval(function(){
         let index=(currentIndex+1)%slideCount;

        gotoSlide(index);
     },3000);
    }
    startTimer();

     //자동타이머 마우스가 올라가면 정지시키는 기능
    slideshowSlides.addEventListener('mouseenter',function(){
        clearInterval(timer);
    });

    slideshowSlides.addEventListener('mouseleave',function(){
        startTimer();
    });
    // console.log(slides[0]);

}//end of slide_func
