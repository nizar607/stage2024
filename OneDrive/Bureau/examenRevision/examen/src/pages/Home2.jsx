import React, { useEffect, useState } from 'react';

function Home2() {
    const [message, setMessage] = useState("welcome to the home page");

    useEffect(() => {
        setTimeout(() => {
            setMessage("");
        }, 3000);
    }, []);
    return <h2>{message}</h2>;

}

export default Home2;