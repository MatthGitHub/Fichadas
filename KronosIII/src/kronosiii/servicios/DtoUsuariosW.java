/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.servicios;

import kronosiii.negocio.entidades.UsuariosWeb;

/**
 *
 * @author Administrador
 */
public class DtoUsuariosW {
    private String nombreUsuario;
    private String clave;
    private String legajo;
    private Integer idEmpleado;
    private Boolean activo;
    private Integer fkRol;
    private Integer idExtreme;

    public DtoUsuariosW(){
        
    }    
    
    public DtoUsuariosW cargarDto(UsuariosWeb aCargar){
        this.setActivo(aCargar.getActivo());
        this.setClave(aCargar.getClave());
        this.setFkRol(aCargar.getFkRol());
        this.setIdEmpleado(aCargar.getIdEmpleado());
        this.setNombreUsuario(aCargar.getNombreUsuario());
        this.setLegajo(aCargar.getLegajo());
        return this;
    }
    
    public String getNombreUsuario() {
        return nombreUsuario;
    }

    public void setNombreUsuario(String nombreUsuario) {
        this.nombreUsuario = nombreUsuario;
    }

    public String getClave() {
        return clave;
    }

    public void setClave(String clave) {
        this.clave = clave;
    }

    public String getLegajo() {
        return legajo;
    }

    public void setLegajo(String legajo) {
        this.legajo = legajo;
    }

    public Integer getIdEmpleado() {
        return idEmpleado;
    }

    public void setIdEmpleado(Integer idEmpleado) {
        this.idEmpleado = idEmpleado;
    }

    public Boolean getActivo() {
        return activo;
    }

    public void setActivo(Boolean activo) {
        this.activo = activo;
    }

    public Integer getFkRol() {
        return fkRol;
    }

    public void setFkRol(Integer fkRol) {
        this.fkRol = fkRol;
    }

    public Integer getIdExtreme() {
        return idExtreme;
    }

    public void setIdExtreme(Integer idExtreme) {
        this.idExtreme = idExtreme;
    }
    
    
    
}
