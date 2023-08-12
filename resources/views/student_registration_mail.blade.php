<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>


<body>
    <table>
        <tbody>
            <tr>
                <th>Name</th>
                <th>{{ $data['name'] }}</th>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>{{ $data['password'] }}</td>
            </tr>
            <tr>
                <td>Login URL</td>
                <td> <a href="{{ $data['url'] }}">Click</a> </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
