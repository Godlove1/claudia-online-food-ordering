

const menuBtn=document.querySelector('.fa-bars');
const menuClose=document.querySelector('.fa-close')
const mobicontainer=document.querySelector('#mobiside');

// search bar
const search_bar=document.querySelector('#search_bar');


const openNav=()=>{
mobicontainer.style.height='100%';
}


const closeNav=()=>{
    mobicontainer.style.height='0';
    }

    const openSearch=()=>{
        search_bar.style.height="80px";
    }

    const closeSearch=()=>{
        search_bar.style.height="0";
    }


    // Show the spinner when the page starts loading
  window.addEventListener('loadstart', function() {
    document.getElementById('spinner').classList.remove('hidden');
  });

  // Hide the spinner when the page has finished loading
  window.addEventListener('load', function() {
    document.getElementById('spinner').classList.add('hidden');
  });