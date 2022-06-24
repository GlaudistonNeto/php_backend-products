import axios from "axios"
import { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export default function ProductList() {

    const [products, setProducts] = useState([]);
    useEffect(() => {
        getProducts();
    }, []);

    function getProducts() {
        axios.get('http://localhost:80/project_products/api/product/')
          .then(function(response) {
            console.log(response.data);
            setProducts(response.data);
        });
    }

    const deleteProduct = (id) => {
        axios.delete(`http://localhost:80/project_products/api/product/${id}/delete`).then(function(response){
            console.log(response.data);
            getProducts();
        });
    }
    return (
        <div>
            <h1>List Products</h1>
            <table>
                <thead>
                    <tr>
                        <th>DELETE</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Width</th>
                        <th>Height</th>
                        <th>Length</th>
                        <th>DVD</th>
                        <th>Book</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    {products.map((product, key) =>
                        <tr key={key}>
                            <td>DEL</td>
                            <td>{product.id}</td>
                            <td>{product.name}</td>
                            <td>{product.price}</td>
                            <td>{product.width}</td>
                            <td>{product.height}</td>
                            <td>{product.length}</td>
                            <td>{product.dvd}</td>
                            <td>{product.book}</td>
                            <td>
                                <Link to={`product/${product.id}/edit`} style={{marginRight: "10px"}}>Edit</Link>
                                <button onClick={() => deleteProduct(product.id)}>Delete</button>
                            </td>
                        </tr>
                    )}
                    
                </tbody>
            </table>
        </div>
    )
}
