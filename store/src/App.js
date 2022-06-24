import {BrowserRouter, Routes, Route, Link} from 'react-router-dom';
import './App.css';
import CreateProduct from './components/CreateProduct';
import EditProduct from './components/EditProduct';
import ProductList from './components/ProductList';

function App() {
  return (
    <div className="App">
      <h5>List of products to be edited, deleted, and added new ones</h5>

      <BrowserRouter>
        <nav>
          <ul>
            <li>
              <Link to="/">List Products</Link>
            </li>
            <li>
              <Link to="product/create">Create Product</Link>
            </li>
          </ul>
        </nav>
        <Routes>
          <Route index element={<ProductList />} />
          <Route path="product/create" element={<CreateProduct />} />
          <Route path="product/:id/edit" element={<EditProduct />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
