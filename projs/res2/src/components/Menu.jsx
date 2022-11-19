import React from 'react';
import MenuCard from './MenuCard';

const Menu = (props) => {
    return (
        <div className="row align-items-center justify-content-even mt-3 ">
            {props.menuItems.map((item) =>
                <MenuCard key={item.id} item={item} />
            )}
        </div>
    );
}

export default Menu;