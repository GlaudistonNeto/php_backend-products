import { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate, useParams } from "react-router-dom";
import { useCallback } from "react";

export default function ListProduct() {
    const navigate = useNavigate();

    const [inputs, setInputs] = useState([]);

    const {id} = useParams();

    const getProduct = useCallback(() => {
      axios.get(`http://localhost:80/project_products/api/product/${id}`)
        .then(function(response) {
            console.log(response.data);
            setInputs(response.data);
        });
    },[id]);

    useEffect(() => {
        getProduct();
    }, [getProduct]);

    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs(values => ({...values, [name]: value}));
    }
    const handleSubmit = (event) => {
        event.preventDefault();

        axios.put(`http://localhost:80/project_products/api/product/${id}/edit`, inputs).then(function(response){
            console.log(response.data);
            navigate('/');
        });
    }
    return (
        <div>
            <h1>Edit Product</h1>
            <form onSubmit={handleSubmit}>
                <table cellSpacing="10">
                    <tbody>
                        <tr>
                            <th>
                                <label>Name: </label>
                            </th>
                            <td>
                                <input value={inputs.name} type="text" name="name" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Price: </label>
                            </th>
                            <td> 
                                <input value={inputs.price} type="text" name="price" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Width: </label>
                            </th>
                            <td>
                                <input value={inputs.width} type="text" name="width" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Height: </label>
                            </th>
                            <td>
                                <input value={inputs.height} type="text" name="height" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Length: </label>
                            </th>
                            <td>
                                <input value={inputs.length} type="text" name="length" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>DVD: </label>
                            </th>
                            <td>
                                <input value={inputs.dvd} type="text" name="dvd" onChange={handleChange} />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label>Book: </label>
                            </th>
                            <td>
                                <input value={inputs.book} type="text" name="book" onChange={handleChange} />
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
