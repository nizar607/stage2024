import { NavLink } from "react-router-dom";

function NavBar() {

    return <>
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
            <a className="navbar-brand" href="#">Navbar</a>
            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarNav">
                <ul className="navbar-nav">
                    <li className="nav-item active">
                        <NavLink
                            style={({ isActive }) => {
                                return isActive ? { textDecoration: "underline" } : {};
                            }}
                            className={({ isActive }) => isActive ? `nav-link text-decoration-underline` : `nav-link`} to="/" >Home</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink

                            className={({ isActive }) => isActive ? `nav-link text-decoration-underline` : `nav-link`} to="competitionsList" >Competitions</NavLink>
                    </li>
                </ul>
            </div>
        </nav >
    </>

}

export default NavBar;