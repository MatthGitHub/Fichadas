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
@Table(name = "TIPOEMPLEADO")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Tipoempleado.findAll", query = "SELECT t FROM Tipoempleado t"),
    @NamedQuery(name = "Tipoempleado.findByIdTipoEmpleado", query = "SELECT t FROM Tipoempleado t WHERE t.idTipoEmpleado = :idTipoEmpleado"),
    @NamedQuery(name = "Tipoempleado.findByDescripcion", query = "SELECT t FROM Tipoempleado t WHERE t.descripcion = :descripcion")})
public class Tipoempleado implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdTipoEmpleado")
    private Integer idTipoEmpleado;
    @Column(name = "Descripcion")
    private String descripcion;
    @OneToMany(mappedBy = "idTipoEmpleado")
    private List<Empleados> empleadosList;

    public Tipoempleado() {
    }

    public Tipoempleado(Integer idTipoEmpleado) {
        this.idTipoEmpleado = idTipoEmpleado;
    }

    public Integer getIdTipoEmpleado() {
        return idTipoEmpleado;
    }

    public void setIdTipoEmpleado(Integer idTipoEmpleado) {
        this.idTipoEmpleado = idTipoEmpleado;
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
        hash += (idTipoEmpleado != null ? idTipoEmpleado.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Tipoempleado)) {
            return false;
        }
        Tipoempleado other = (Tipoempleado) object;
        if ((this.idTipoEmpleado == null && other.idTipoEmpleado != null) || (this.idTipoEmpleado != null && !this.idTipoEmpleado.equals(other.idTipoEmpleado))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Tipoempleado[ idTipoEmpleado=" + idTipoEmpleado + " ]";
    }
    
}
