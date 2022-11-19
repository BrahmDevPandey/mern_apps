import React from 'react';

const Navbar = (props) => {
    return (
        <nav className="my-navbar">
            {
                props.categoryList.map((category) =>
                    <button className="nav-btn" onClick={() => props.updateMenu(category)}>{category}</button>
                )
            }
            <button className="nav-btn" onClick={() => props.updateMenu("All")} selected>All</button>
        </nav>
    );
}

export default Navbar;