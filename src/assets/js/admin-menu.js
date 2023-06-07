
const menuBtn=document.querySelector('.fa-bars');
const menuClose=document.querySelector('.fa-close');
const sidebar=document.querySelector('.side__nav');

const openNav=()=>{
sidebar.style.width='100%';
// menuBtn.style.display="none";
// menuClose.style.display="block";
}


const closeNav=()=>{
    sidebar.style.width='0';
    // menuBtn.style.display="block";
    // menuClose.style.display="none";
    }