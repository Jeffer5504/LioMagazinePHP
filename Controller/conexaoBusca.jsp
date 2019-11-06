<%@page import="br.com.liomagazine.Busca"%>
<%@page import="br.com.liomagazine.Cliente"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.util.List"%>
<%@page import="java.sql.Types"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.SQLException"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Lio Magazine - Cliente Confirma</title>
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/config.css">
        <link rel="stylesheet" href="./css/style.css">
        <script src="js/all.js"></script>
    </head>
    <body>
        <div class="box" style="color: #333;">
            <a href="inicio.html">
                <i class="fas fa-arrow-left" id="voltar"></i>
            </a>
       <%
            // Variaveis finais do HTML
            String select = request.getParameter("select");
            String busca = request.getParameter("busca");
            
            // Obj Busca
            Busca b = new Busca(select, busca);
            
            try {
            //Conexão com Banco de dados
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost:3306/liomagazine", "root", "");
                
            switch(select){
                case "CLIENTE":
                String sql = ("SELECT * FROM cliente WHERE cliente LIKE '%"+b.getBusca()+"%'");
                PreparedStatement stmt = conexao.prepareStatement(sql);
                ResultSet rs = stmt.executeQuery();

                while(rs.next()){
                    int id = rs.getInt("idCliente");
                    String cliente = rs.getString("cliente"); 
                    String email = rs.getString("email");  
                    String telefone = rs.getString("telefone");  

                    out.println("ID: " + id + "<p></p>");
                    out.println("Nome: " + cliente + "<p></p>");
                    out.println("Email: " + email + "<p></p>");
                    out.println("Telefone: " + telefone + "<p></p>");
                    
                    String sql2 = ("SELECT idProduto,quantidade FROM venda WHERE idCliente = "+id);
                    PreparedStatement stmt2 = conexao.prepareStatement(sql2);
                    ResultSet rs2 = stmt2.executeQuery();

                    while(rs2.next()){
                        int idProduto = rs2.getInt("idProduto");
                        int quantidade = rs2.getInt("quantidade");
                        
                        String sql01 = ("SELECT nome FROM produto WHERE idProduto = "+idProduto);
                        PreparedStatement stmt01 = conexao.prepareStatement(sql01);
                        ResultSet rs01 = stmt01.executeQuery();

                        while(rs01.next()){
                            String nome = rs01.getString("nome");
                            out.println("Produto comprado: " + nome + " ("+quantidade+")<p></p>");
                        } 
                    } 
                }
                

                
                ;break;
            
                case "PRODUTO":
                String sql3= ("SELECT * FROM produto WHERE nome ='"+b.getBusca()+"'");
                PreparedStatement stmt3 = conexao.prepareStatement(sql3);
                ResultSet rs3 = stmt3.executeQuery();

                while(rs3.next()){
                    int id = rs3.getInt("idProduto");
                    String nome = rs3.getString("nome"); 
                    String descricao = rs3.getString("descricao");  
                    int quantidade = rs3.getInt("quantidade");  
                    Float preco = rs3.getFloat("preco");  
                    Float desconto = rs3.getFloat("desconto");  
                    Float subtotal = rs3.getFloat("subtotal");  
                    String data = rs3.getString("data");  

                    out.println("Id: " + id + "<br>");
                    out.println("Produto: " + nome + "<br>");
                    out.println("Descrição: " + descricao + "<br>");
                    out.println("Quantidade: " + quantidade + "<br>");
                    out.println("Preço: " + preco + "<br>");
                    out.println("Desconto" + desconto + "<br>");
                    out.println("Subtotal: " + subtotal + "<br>");
                    out.println("Data: " + data + "<br>");
                };break;
 
                case "VENDA":
                    String sql4= ("SELECT * FROM venda WHERE data LIKE '%"+b.getBusca()+"%'");
                    PreparedStatement stmt4 = conexao.prepareStatement(sql4);
                    ResultSet rs4 = stmt4.executeQuery();

                    while(rs4.next()){
                        int idv = rs4.getInt("idVenda");
                        int idc = rs4.getInt("idCliente");
                        int idp = rs4.getInt("idProduto");
                        String desconto = rs4.getString("desconto"); 
                        int quantidade = rs4.getInt("quantidade");  
                        Float subtotal = rs4.getFloat("subtotal");  
                        Float total = rs4.getFloat("total");  
                        String obs = rs4.getString("obs");   
                        String data = rs4.getString("data");  

                        out.println("IdVenda: " + idv + "<br>");
                        out.println("IdCliente: " + idc + "<br>");
                        out.println("IdProduto: " + idp + "<br>");
                        out.println("Desconto: " + desconto + "<br>");
                        out.println("Quantidade: " + quantidade + "<br>");
                        out.println("Subtotal: " + subtotal + "<br>");
                        out.println("Total: " + total + "<br>");
                        out.println("OBS: " + obs+ "<br>");
                        out.println("Data: " + data + "<br><br>");
                    };break;
                
                }
            
            }
             catch (Exception e) {
                out.println("Erro " + e);
              } 

        %>
        </div>
    </body>
</html>