import { BrowserRouter, Route, Routes, Link } from 'react-router-dom';

// CSS
import './App.css';

// components
import { CreateProducts } from './components/CreateProducts';
import { DeleteProducts } from './components/DeleteProducts';
import EditProducts from './components/EditProducts';
import { ProductsList } from './components/ProductsList';

function App() {

  return (
    <div className="App">
    <h5>List, deletion, edition, and creation of products</h5>
      <BrowserRouter>
        <nav>
          <ul>
            <li>
              <Link to="/">Products List</Link>
            </li>
            <li>
              <Link to="/product/create">Products Creation</Link>
            </li>
          </ul>
          <Routes>
            <Route index element={<ProductsList />} />
            <Route path='product/create' element={<CreateProducts />} />
            <Route path='product/edit' element={<EditProducts />} />
          </Routes>
        </nav>
      </BrowserRouter>
    </div>
  );
}

export default App;
