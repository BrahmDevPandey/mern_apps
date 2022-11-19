import ChangeColorOnClick from "./components/ChangeColorOnClick";
import ChangeColorOnHover from "./components/ChangeColorOnHover";
import { NameContext } from "./components/NameContext";

const App = () => {
  return (
    <div className="text-center">
      <NameContext.Provider value="Change on Click">
        <ChangeColorOnClick />
      </NameContext.Provider>

      <NameContext.Provider value="Change On Hover">
        <ChangeColorOnHover />
      </NameContext.Provider>
    </div>
  );
};

export default App;
