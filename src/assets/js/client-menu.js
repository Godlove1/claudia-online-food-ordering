

const menuBtn=document.querySelector('.fa-bars');
const menuClose=document.querySelector('.fa-close')
const mobicontainer=document.querySelector('#mobiside');

// search bar
const search_bar=document.querySelector('#search_bar');


const openNav=()=>{
mobicontainer.style.width='100%';
}


const closeNav=()=>{
    mobicontainer.style.width='0';
    }

    const openSearch=()=>{
        search_bar.style.height="80px";
    }

    const closeSearch=()=>{
        search_bar.style.height="0";
    }