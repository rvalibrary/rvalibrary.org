
let params = {
  automate: {
    automation: true,
    speed: 10
  },
  navDots: true,
  captions: false,
  arrows: false,
  expand: false
}


function updateDropDownText(ele, text) {
  ele.innerHTML = `Branch - ${text} <span class="caret"></span>`;
};


 function fetchEvents(branch, btn, catId) {
  jQuery.post('/wp-admin/admin-ajax.php', {'action': 'event_fetch', 'branch': branch, 'audience': catId},
    function(eventsArr){
      eventsArr = JSON.parse(eventsArr);
      removeLoader(document.querySelector('.loaderCircle'));
      if(eventsArr.length){
        buildSliderHTML(document.querySelector('.slider-container'), eventsArr);
        document.querySelector('.slider-container').style.opacity = '1';
        btn.removeAttribute('disabled');
        let slider = sliderFactory( document.querySelector('.slider'), params);
        slider.init();
      } else {
        document.querySelector('.slider-container').style.opacity = '1';
        console.log('no events yo');
        btn.removeAttribute('disabled');
        document.querySelector('.slider-container').innerHTML = " ";
        document.querySelector('.slider-container').innerHTML = '<h1 style="text-align:center;">No events at this location. Choose another library.';
      }
    })
}

function triggerLoader(ele){
  ele.innerText = "";
  ele.insertAdjacentHTML('beforebegin', `<div style="margin: 0 auto; margin-top: 50px;" class="loaderCircle"></div>`);
  ele.style.opacity = '0';
}

function removeLoader(ele){
  ele.parentElement.removeChild(ele);
}

function buildSliderHTML(root, events){
  const defaultImg = 'https://rvalibrary.org/wp-content/uploads/2021/05/rpl-logo-blue.png';
  let htmlStr = `<div class="expand-icon-container">
    <svg class="expand-icon" width="40" height="40" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g filter="url(#filter3_d)">
    <path d="M4.0659 11.0033C4.06768 11.5535 4.51849 11.9981 5.0728 11.9963L14.1058 11.967C14.6601 11.9652 15.108 11.5177 15.1062 10.9674C15.1045 10.4172 14.6536 9.97258 14.0993 9.97438L6.07 10.0004L6.04414 2.02997C6.04235 1.47972 5.59155 1.03512 5.03724 1.03691C4.48293 1.03871 4.03502 1.48623 4.03681 2.03648L4.0659 11.0033ZM5.21845 9.43769L4.35758 10.2978L5.78155 11.7022L6.64242 10.8421L5.21845 9.43769Z" fill="white"/>
    </g>
    <g filter="url(#filter4_d)">
    <path d="M19.3091 2.00304C19.3108 1.45279 18.8628 1.00537 18.3085 1.00369L9.27546 0.976336C8.72115 0.974657 8.27044 1.41936 8.26878 1.96961C8.26711 2.51985 8.71512 2.96728 9.26943 2.96895L17.2988 2.99327L17.2746 10.9637C17.273 11.514 17.721 11.9614 18.2753 11.9631C18.8296 11.9648 19.2803 11.5201 19.282 10.9698L19.3091 2.00304ZM18.7076 3.00803L19.013 2.70665L17.5979 1.29335L17.2924 1.59474L18.7076 3.00803Z" fill="white"/>
    </g>
    <defs>
    <filter id="filter3_d" x="0.0368042" y="1.03691" width="19.0694" height="18.9594" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
    <feOffset dy="4"/>
    <feGaussianBlur stdDeviation="2"/>
    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
    </filter>
    <filter id="filter4_d" x="4.26877" y="0.976331" width="19.0404" height="18.9868" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
    <feOffset dy="4"/>
    <feGaussianBlur stdDeviation="2"/>
    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
    </filter>
    </defs>
    </svg>
  </div>
  <div class="picture-row">`;
  events.forEach((event) => {
    let startDate = new Date(event['start']);
    let endDate   = new Date(event['end']);
    htmlStr += `<div class="carousel-img">
    <div class="img-container">
       <img src="${event['featured_image'] ? event['featured_image'] : defaultImg}" class="img" style="max-height: 100%;">
    </div>
    <div class="slider-text-area">
       <h3 style="color: #004765">${event['title']}</h3>
       <h5>${startDate.toLocaleString('en-US', {day: 'numeric', month: 'long'})}</h5>
       <h5>${startDate.toLocaleString('en-US', {hour: '2-digit', minute: '2-digit'})} - ${endDate.toLocaleString('en-US', {hour: '2-digit', minute: '2-digit'})}</h5>
       <div display="inline-block">`;
       event['category'].forEach((singleCategory) => {
         htmlStr += `<span style="display: inline-block; font-weight: bold; font-size: 12px; color: #ff7236; text-decoration: underline;">${singleCategory['name']}</span> `;
       });
       htmlStr += `</div>
       <p style="max-width: 1000px; font-size: 16px;">${event['description'].slice(0, 250)}...</p>
       <a style="align-self: flex-start;" href="${event['url']['public']}" class="btn btn-primary">Learn More</a>
    </div>
   </div>`
 });
 htmlStr += `</div>
<div class="caption-container">
</div>
<div class="dot-container dot-container-top">
</div>
</div>
</div>`;
root.innerHTML = "";
root.insertAdjacentHTML('afterbegin', htmlStr);
}


addEventListener("load", () => {

  let dropDownBtn           = document.querySelector('.dropdown-toggle');
  let dropDownMenu          = document.querySelector('.dropdown-menu');
  let sliderContainer       = document.querySelector('.slider');

  dropDownMenu.addEventListener("click", (e) => {
    dropDownBtn.setAttribute('disabled', 'true');
    dropDownMenu.style.display = "none";
    const location = e.target.outerText;
    updateDropDownText(dropDownBtn, location);
    triggerLoader(document.querySelector('.slider-container'));
    fetchEvents(location, dropDownBtn, sliderContainer.getAttribute('data-cat'));

  });

  let slider = sliderFactory( sliderContainer, params );
  slider.init();

  parallaxImg = document.querySelector('.parallax-img');
if(window.innerWidth > 850)
  window.addEventListener('scroll', () =>{
    parallaxImg.style.transform = `translate3d(0px, ${window.pageYOffset * 0.1}px, 0px)`;
  })

})
