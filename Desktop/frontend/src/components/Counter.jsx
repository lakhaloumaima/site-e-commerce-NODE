import React, { useEffect, useState } from 'react';

function Counter({index}) {
   //useState(0) => initialiser a 0
   const [counter, setcounter] = useState(0);
   const increment=() =>{
     setcounter(counter+1);
   }
   const decrement = () =>{
     setcounter(counter-1);
   };
   //bsh tahky maa serveur bel useEffect
   useEffect(
     ()=> {} ,[]
     );
    return (
        <div>
        <span style={{fontSize:"100px"}}>{counter}</span>
      <div>
        <button onClick={()=>increment()} className='buttonstyles'>+</button>
        <button onClick={()=>decrement()} className='buttonstyles'>-</button>
      </div>
        </div>
    )
}
export default Counter;