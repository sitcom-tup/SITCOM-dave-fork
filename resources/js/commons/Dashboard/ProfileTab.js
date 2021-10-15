import React from 'react'

const ProfileTab = () => {
    return (
        <>

            <div className="container">
            <div className="main-body">
              <div className="row">
                <div className="col-lg-4">
                  <div className="card" >
                    <div className="card-body" >
                      <div className="d-flex flex-column align-items-center text-center">
                        <img
                          src="https://icon-library.com/images/avatar-icon-free/avatar-icon-free-10.jpg"
                          alt="Admin"
                          className="rounded-circle p-1 bg-danger"
                          width={110}
                        />
                        <div className="mt-3">
                          <h4>Dave Estopa</h4>
                          <p className="text-secondary mb-1">BSIT Coordinator</p>
                          <p className="text-muted font-size-sm">
                            Computer Engineering Technology
                          </p>
                        </div>
                      </div>
                      <hr className="my-4" />
                      <ul className="list-group list-group-flush">
                        
                        <li className="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 className="mb-0">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width={24}
                              height={24}
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              strokeWidth={2}
                              strokeLinecap="round"
                              strokeLinejoin="round"
                              className="feather feather-facebook me-2 icon-inline text-primary"
                            >
                              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                            Facebook
                          </h6>
                          <span className="text-secondary">davestopa</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div className="col-lg-8">
                  <div className="card" >
                    <div className="card-body" >
                      <div className="row mb-3">
                        <div className="col-sm-3">
                          <h6 className="mb-0">Full Name</h6>
                        </div>
                        <div className="col-sm-9 text-secondary">
                          <input
                            type="text"
                            className="form-control"
                            defaultValue="John Doe"
                          />
                        </div>
                      </div>
                      <div className="row mb-3">
                        <div className="col-sm-3">
                          <h6 className="mb-0">Email</h6>
                        </div>
                        <div className="col-sm-9 text-secondary">
                          <input
                            type="text"
                            className="form-control"
                            defaultValue="dj@example.com"
                          />
                        </div>
                      </div>
                      <div className="row mb-3">
                        <div className="col-sm-3">
                          <h6 className="mb-0">Phone</h6>
                        </div>
                        <div className="col-sm-9 text-secondary">
                          <input
                            type="text"
                            className="form-control"
                            defaultValue="895 9994"
                          />
                        </div>
                      </div>
                      <div className="row mb-3">
                        <div className="col-sm-3">
                          <h6 className="mb-0">Mobile</h6>
                        </div>
                        <div className="col-sm-9 text-secondary">
                          <input
                            type="text"
                            className="form-control"
                            defaultValue="097374839393"
                          />
                        </div>
                      </div>
                      <div className="row mb-3">
                        <div className="col-sm-3">
                          <h6 className="mb-0">Address</h6>
                        </div>
                        <div className="col-sm-9 text-secondary">
                          <input
                            type="text"
                            className="form-control"
                            defaultValue="Brgy Central Signal"
                          />
                        </div>
                      </div>
                      <div className="row">
                        <div className="col-sm-3" />
                        <div className="col-sm-9 text-secondary">
                          <input
                            type="button"
                            className="btn btn-primary px-4"
                            defaultValue="Update Profile"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </> 
    
    );
}
 
export default ProfileTab;