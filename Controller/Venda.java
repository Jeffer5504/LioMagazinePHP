package br.com.liomagazine;

public class Venda {
    
    private String email;
    private String produto;
    private int idCliente;
    private int idProduto;
    private float preco;
    private int quantidade;
    private float desconto;
    private float subtotal;
    private float total;
    private String obs;
    private String data;
    private int dbQuantidade;
    private float dbSubtotal;

    public Venda(String email, String produto, float desconto, int quantidade, String obs, String data) {
        this.email = email;
        this.produto = produto;
        this.desconto = desconto;
        this.quantidade = quantidade;
        this.obs = obs;
        this.data = data;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getProduto() {
        return produto;
    }

    public void setProduto(String produto) {
        this.produto = produto;
    }

    public int getIdCliente() {
        return idCliente;
    }

    public void setIdCliente(int idCliente) {
        this.idCliente = idCliente;
    }

    public int getIdProduto() {
        return idProduto;
    }

    public void setIdProduto(int idProduto) {
        this.idProduto = idProduto;
    }

    public float getDesconto() {
        return desconto;
    }
    
    public void setDesconto(float desconto) {
        this.desconto = desconto;
    }
    
    public float getPreco() {
        return preco;
    }

    public void setPreco(float preco) {
        this.preco = preco;
    }

    public int getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    public float getSubtotal() {
        return subtotal;
    }

    public void setSubtotal() {
        this.subtotal = quantidade * dbSubtotal;
    }

    public float getTotal() {
        return total;
    }

    public void setTotal() {
        this.total = subtotal - (subtotal * (desconto/100));  
    }

    public String getObs() {
        return obs;
    }

    public void setObs(String obs) {
        this.obs = obs;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public int getDbQuantidade() {
        if (this.dbQuantidade >= this.quantidade){
            return this.dbQuantidade - this.quantidade;
        }else{
            return this.dbQuantidade;
        }
    }

    public void setDbQuantidade(int dbQuantidade) {
        this.dbQuantidade = dbQuantidade;
    }

    public float getDbSubtotal() {
        return dbSubtotal;
    }

    public void setDbSubtotal(float dbSubtotal) {
        this.dbSubtotal = dbSubtotal;
    }
    
}