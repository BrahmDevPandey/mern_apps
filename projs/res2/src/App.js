import React, { useState } from "react";
import "./bootstrap/css/bootstrap.min.css";
import Menu from "./components/Menu";
import items from "./components/MenuData";
import "./App.css";
import Navbar from "./components/Navbar";

const uniqueList = [
  ...new Set(
    items.map((item) => {
      return item.category;
    })
  ),
];

const App = () => {
  const [menuItems, setMenuItems] = useState(items);
  const [menuList, setMenuList] = useState(uniqueList);

  const filterByCategory = (category) => {
    const updatedMenu =
      category !== "All"
        ? items.filter((item) => {
            return item.category === category;
          })
        : items;
    setMenuItems(updatedMenu);
  };

  return (
    <>
      <Navbar categoryList={uniqueList} updateMenu={filterByCategory} />
      <Menu menuItems={menuItems} />
    </>
  );
};

export default App;
