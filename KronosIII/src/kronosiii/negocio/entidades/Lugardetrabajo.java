/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "LUGARDETRABAJO")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Lugardetrabajo.findAll", query = "SELECT l FROM Lugardetrabajo l"),
    @NamedQuery(name = "Lugardetrabajo.findByIdLugarTrabajo", query = "SELECT l FROM Lugardetrabajo l WHERE l.idLugarTrabajo = :idLugarTrabajo"),
    @NamedQuery(name = "Lugardetrabajo.findByDescripcion", query = "SELECT l FROM Lugardetrabajo l WHERE l.descripcion = :descripcion")})
public class Lugardetrabajo implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdLugarTrabajo")
    private Integer idLugarTrabajo;
    @Column(name = "Descripcion")
    private String descripcion;
    @OneToMany(mappedBy = "idLugarTrabajo")
    private List<Empleados> empleadosList;

    public Lugardetrabajo() {
    }

    public Lugardetrabajo(Integer idLugarTrabajo) {
        this.idLugarTrabajo = idLugarTrabajo;
    }

    public Integer getIdLugarTrabajo() {
        return idLugarTrabajo;
    }

    public void setIdLugarTrabajo(Integer idLugarTrabajo) {
        this.idLugarTrabajo = idLugarTrabajo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    @XmlTransient
    public List<Empleados> getEmpleadosList() {
        return empleadosList;
    }

    public void setEmpleadosList(List<Empleados> empleadosList) {
        this.empleadosList = empleadosList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idLugarTrabajo != null ? idLugarTrabajo.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Lugardetrabajo)) {
            return false;
        }
        Lugardetrabajo other = (Lugardetrabajo) object;
        if ((this.idLugarTrabajo == null && other.idLugarTrabajo != null) || (this.idLugarTrabajo != null && !this.idLugarTrabajo.equals(other.idLugarTrabajo))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Lugardetrabajo[ idLugarTrabajo=" + idLugarTrabajo + " ]";
    }
    
}
