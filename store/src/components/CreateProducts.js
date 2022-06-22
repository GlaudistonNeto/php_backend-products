import { useState } from "react";
import axios from 'axios';

export const CreateProducts = () => {
  const [inputs, setInputs] = useState({});

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs(values => ({ ...values, [name]: value }));

    console.log(inputs);
  }

  const handleSubmit = (event) => {
    event.preventDefault();

    axios.post('http://localhost:80/project_products/api/products/create.php', inputs);
    console.log(inputs);
  }

  return (
    <div>
    <h1>List of products</h1>
      <form onSubmit={handleSubmit}>
      <table cellSpacing="10">
          <tbody>
            <tr>
              <th>
                <label htmlFor="">Name:</label>
              </th>
                <td>
                  <input type="text" placeholder="name" name="name" onChange={handleChange} />
                </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">price:</label>
              </th>
                <td>                
                  <input type="text" placeholder="$: 0.00" name="price" onChange={handleChange} />
                </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">width:</label>
              </th>       
                <td>
                  <input type="text" placeholder="000g" name="width" onChange={handleChange} />
                </td>
            </tr>
            <tr>       
              <th>
                <label htmlFor="">height:</label>
              </th>
                <td>
                  <input type="text" placeholder="000cm" name="height" onChange={handleChange} />
                </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">length:</label>
              </th>
                <td>
                  <input type="text" placeholder="000cm" name="length" onChange={handleChange} />
                </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">DVD:</label>
              </th>
                <td>
                  <input type="text" placeholder="000MB" name="length" onChange={handleChange} />
                </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">Book:</label>
              </th>
                <td>
                  <input type="text" placeholder="0.00kg" name="Book" onChange={handleChange} />
                </td>
            </tr>
              <tr>
                <td colSpan="2" align="right">            
                  <button type="submit">Send</button>
                </td>
              </tr>
          </tbody>
        </table>
      </form>
    </div>
  );
};
