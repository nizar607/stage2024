
import React, { useState } from 'react';

function NotFound() {

    const [message, setMessage] = useState("NOT FOUND 404");

    setTimeout(() => {
        setMessage("")
    }, 3000);
    
    return <>
        <h1>{message}</h1>
    </>

}

export default NotFound;