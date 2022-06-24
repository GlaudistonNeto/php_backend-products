import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

export default function ProductList() {
    const navigate = useNavigate();

    const [inputs, setInputs] = useState([]);

    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs(values => ({...values, [name]: value}));
    }
    const handleSubmit = (event) => {
        event.preventDefault();

        axios.post('http://localhost:80/project_products/api/product/save', inputs)
          .then(function(response){
            console.log(response.data);
            navigate('/');
        });
        
    }
    return (
        <div>
            <h1>Create product</h1>
            <form onSubmit={handleSubmit}>
                <table cellSpacing="10">
                    <tbody>
                        <tr>
                            <th>
                                <label>Name: </label>
                            </th>
                            <td>
                                <input type="text" name="name" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Price: </label>
                            </th>
                            <td> 
                                <input type="text" name="price" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Width: </label>
                            </th>
                            <td>
                                <input type="text" name="width" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Height: </label>
                            </th>
                            <td>
                                <input type="text" name="height" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Length: </label>
                            </th>
                            <td>
                                <input type="text" name="length" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>DVD: </label>
                            </th>
                            <td>
                                <input type="text" name="dvd" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Book: </label>
                            </th>
                            <td>
                                <input type="text" name="book" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <td colSpan="2" align ="right">
                                <button>Save</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    )
}
