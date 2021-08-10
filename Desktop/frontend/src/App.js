import React from 'react';
import './App.css';
import Counter from "./components/Counter";

function App() {
    return (
        //<div> = 1 seul parent
        <div className="App">
        <Counter index={1}/>
        <Counter index={2}/>
        <Counter index={3}/>
        </div>
    ) ;
}

export default App;