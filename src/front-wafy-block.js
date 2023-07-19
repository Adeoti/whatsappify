import React from 'react'
import ReactDom from 'react-dom'
import './front-wafy-block.scss'
import { Button } from '@wordpress/components'


const wafyCtas = document.querySelectorAll('.wafy_cta_block_button');


wafyCtas.forEach(function(wafycta){
    //div.innerHTML = "Hello";

    const data = JSON.parse(wafycta.querySelector('pre').innerHTML);
    ReactDom.render(<WafyButton {...data} />, wafycta);
    //wafycta.classList.remove('wafy_cta_block_button');
});

function WafyButton(props){
    let ctashape = "";
    if(!props.wafyShape){
        ctashape = '10';
    }else{
        ctashape = props.wafyShape;
    }

    let wafyLink = `https://api.whatsapp.com/send?phone=${props.wafyNumber ?? ''}&text=${props.wafyMsg ? props.wafyMsg: ''}`;
    let wafyStyles = {
        color: props.wafyColor ?? '#fff',
        backgroundColor: props.wafyBg ?? '#128F3E',
        borderRadius: ctashape+'px',
        padding:'15px 32px',
        fontSize: '16px',
        fontWeight: '500',
        textDecoration: 'none',
        display:'inline-block',
    };
    return(
        <>
           <a href={wafyLink ?? '#'} style={wafyStyles}>
                <i class="fab fa-whatsapp" style={{fontSize:'20px'}}></i>
                &nbsp; {props.wafyText ?? 'Chat our reps'}
           </a>
        </>
    )
}

